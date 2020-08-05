import Button from "@material-ui/core/Button";
import React from "react";


export default function BackButton() {
    return (
        <div className="row justify-content-center">
            <Button href={'/'}>
                <h5>Go back</h5>
            </Button>
        </div>
    );
}

