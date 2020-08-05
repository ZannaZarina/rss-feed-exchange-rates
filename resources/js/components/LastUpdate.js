import React from 'react';

export default function LastUpdate(props) {
    return (
        <div className="row justify-content-center">
            <h2>
                Last update: {props.date}
            </h2>

        </div>
    );
}
