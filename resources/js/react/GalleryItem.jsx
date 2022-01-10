import React, { useState } from "react";
import PropTypes from "prop-types";

// functional componenet -> predstavuje jeden obrazok v galerii
function GalleryItem(props) {
    // state na novy nazov obrazku
    // ked sa zmeni state, zmeni sa html 
    const [newName, setNewName] = useState(props.galleryImage?.name);

    // jsx = html + js
    return (
        <div key={props.galleryImage.id} className="gallery-image-item">
            {/* zobrazenie obrazku s danym id */}
            <img
                src={`${location.origin}/image/${props.galleryImage.image?.id}`}
                alt=""
            />
            {/* ak je pouzivatel prihlaseny vypisem input, ktory zmeni nazov obrazku v galerii*/}
            {props.isAuthorized ? (
                <input
                    className="gallery-item-input" 
                    onInput={(e) => {
                        setNewName(e.target.value);
                    }}
                    value={newName}
                />
            ) : (
                <p>{newName}</p>
            )}
            {/* zobrazim tlacidla edit a delete ak je prihlaseny */}
            {props.isAuthorized ? (
                <div>
                    <button
                        className="btn-submit btn-gallery-edit gallery-btns"
                        onClick={() => {
                            console.log("Click edit");
                            // zavolam funkciu z propov s danymi parametrami
                            props.editGalleryImage(
                                props.galleryImage.id,
                                newName
                            );
                        }}
                    >
                        edit
                    </button>
                    <button
                        className="btn-submit btn-gallery-delete gallery-btns"
                        onClick={() => {
                            console.log("Click delete");
                            // zavolam funkciu z propov s danymi parametrami
                            props.deleteGalleryImage(props.galleryImage.id);
                        }}
                    >
                        delete
                    </button>
                </div>
            ) : null}
        </div>
    );
}

GalleryItem.propTypes = {
    galleryImage: PropTypes.object.isRequired,
};

export default GalleryItem;
