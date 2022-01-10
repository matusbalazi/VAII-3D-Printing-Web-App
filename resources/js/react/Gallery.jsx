import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import PropTypes from "prop-types";
import axios from "axios";
import GalleryItem from "./GalleryItem";

// functional component, ktory vykresluje celu galeriu
function Gallery(props) {
    // state, ktory obsahuje celu galeriu v poli
    const [galleryImages, setGalleryImages] = useState([]);
    // tieto dva states su pouzite vo formulari pri vytvarani noveho prvku v galerii
    const [galleryImageName, setGalleryImageName] = useState("");
    const [galleryImageFile, setGalleryImageFile] = useState({});
    // state, ktory obsahuje chybove hlasky v poli
    const [errorMessages, setErrorMessages] = useState([]);
    // state ci je pouzivatel prihlaseny alebo nie
    const [isAuthorized, setIsAuthorized] = useState(false);

    // pri nacitani komponentu spust funkcie
    useEffect(() => {
        fetchGalleryImages();
        fetchUser();
    }, []);

    // nacitaj z backendu vsetky prvky galerie
    // ak je vysledok spravny, tak nastav state => re-render
    const fetchGalleryImages = () => {
        // axios - package, ktoreho ulohou je vytvaranie asynchronnych requestov
        axios
            .get(props.galleryUrl)
            .then((res) => {
                if (res.status === 200) {
                    setGalleryImages(res.data);
                }
            })
            .catch((err) => {
                console.log(err);
            });
    };

    // to iste co vyssie, ale zisti ci je pouzivatel prihlaseny
    // ak je vysledok spravny, tak nastav state => re-render
    const fetchUser = () => {
        axios
            .get(props.userUrl)
            .then((res) => {
                if (res.status === 200 && res.data === 1) {
                    setIsAuthorized(true);
                }
            })
            .catch((err) => {
                console.log(err);
            });
    };

    // odosle formular, ked pouzivatel stlaci btn submit, ale najskor zvaliduje
    const submitForm = () => {
        // validacia
        if (
            galleryImageName.length === 0 ||
            galleryImageFile.length === 0 ||
            galleryImageFile[0]?.type.split("/")[0] !== "image"
        ) {
            // ... znamena pridanie do existujuceho pola
            console.log("err");
            setErrorMessages([...errorMessages, "Form filled wrong"]);
            return;
        }
        // Musime dat formdata, lebo posielame image
        let formData = new FormData();
        formData.append("name", galleryImageName);
        formData.append("image", galleryImageFile[0]);
        axios
            .post(props.galleryUrl, formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((res) => {
                if (res.status === 200) {
                    // novo vytvoreny obrazok pridame do pola a vymazeme errory
                    setGalleryImages([
                        ...galleryImages,
                        res.data.gallery_image,
                    ]);
                    setErrorMessages([]);
                }
            })
            .catch((err) => {
                console.log(err);
            });
    };

    // vymaze obrazok z galerie a zavola delete request
    const deleteGalleryImage = (id) => {
        console.log("ok deletujem " + id);
        axios
            .delete(`${props.galleryUrl}/${id}`)
            .then((res) => {
                if (res.status === 200 && res.data.operation === "success") {
                    setGalleryImages(
                        // z pola vymazeme iba ten zaznam, ktory ma id mazaneho obrazku
                        galleryImages.filter((galleryImage) => {
                            return galleryImage.id !== id;
                        })
                    );
                }
            })
            .catch((err) => {
                console.log(err);
            });
    };

    // upravi nazov obrazka v galerii a zavola patch request
    const editGalleryImage = (id, name) => {
        console.log("ok editujem, " + id, name);
        if (name.length === 0) {
            console.log("errr");
            setErrorMessages([...errorMessages, "Form filled wrong"]);
            return;
        }
        axios
            .patch(`${props.galleryUrl}/${id}`, { name: name })
            .then((res) => {
                console.log(res);
                if (res.status === 200 && res.data.operation === "success") {
                    setGalleryImages(
                        // map = foreach
                        galleryImages.map((galleryImage) => {
                            // upravi iba obrazok s id upravovaneho obrazku
                            if (galleryImage.id === id) {
                                galleryImage.name = name;
                            }
                            return galleryImage;
                        })
                    );
                }
            })
            .catch((err) => {
                console.log(err);
            });
    };

    return (
        <div>
            <div className="shop-heading gallery-heading">
                <h1>Designed and Manufactured by you   <i class="fas fa-tools"></i></h1>
            </div>
            {errorMessages.length > 0 ? (
                // ak su nejake errory, tak ich vypise
                <div class="error-message">
                    <h2 class="error-heading">Oh, something bad happened :(</h2>
                    <ol class="list-of-errorMessages">
                        {/* prejde polom errorov a vypise error do li */}
                        {errorMessages.map((error) => (
                            <li>
                                <p class="error">{error}</p>
                            </li>
                        ))}
                    </ol>
                </div>
            ) : null}

            {/* ak je pouzivatel prihlaseny, tak moze vytvarat obrazky v galerii */}
            {isAuthorized ? (   
                <div className="add-gallery-image">
                    <h3 class="shop-heading">Add new item</h3>
                    <form
                        className="contact-form-containers create"
                        onSubmit={(e) => {
                            e.preventDefault();
                            submitForm();
                        }}
                    >
                        <input
                            type="text"
                            placeholder="Name"
                            // ak pouzivatel nieco napise, tak sa zmeni state
                            onInput={(e) => {
                                setGalleryImageName(e.target.value);
                            }}
                        />
                        <input
                            type="file"
                            // ked pouzivatel vyberie subor, tak sa subor ulozi do state
                            onChange={(e) => {
                                console.log(e.target);
                                setGalleryImageFile(e.target.files);
                            }}
                        />
                        <button type="submit" className="btn-submit btn-gallery">Submit</button>
                    </form>
                </div>
            ) : null}

            {/* Vypisanie gallery itemov */}
            <div className="gallery-images">
                {galleryImages.map((galleryImage) => {
                    return (
                        <GalleryItem
                            galleryImage={galleryImage}
                            deleteGalleryImage={deleteGalleryImage}
                            editGalleryImage={editGalleryImage}
                            isAuthorized={isAuthorized}
                            key={galleryImage.id}
                        />
                    );
                })}
            </div>
        </div>
    );
}

Gallery.propTypes = {
    galleryUrl: PropTypes.string.isRequired,
};

export default Gallery;

// prevezmem komponent react-gallery
let galleryWrapperDiv = document.getElementById("react-gallery");
if (galleryWrapperDiv) {
    // vypisanie gallery komponentu do div#react-gallery
    ReactDOM.render(
        <Gallery
            // dataset = objekt, ktory pristupuje k datam
            galleryUrl={galleryWrapperDiv.dataset.galleryUrl}
            userUrl={galleryWrapperDiv.dataset.userUrl}
        />,
        galleryWrapperDiv
    );
}
