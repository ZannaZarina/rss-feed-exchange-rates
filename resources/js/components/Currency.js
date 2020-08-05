import React from 'react';

export default function ShowCurrencyName(props) {
    return (
        <div className="d-flex justify-content-center mt-4">
            <img src={`https://fxtop.com/ico/${(props.data)[0].currency}.gif`} height={'100%'}
                 alt="flag icon"/>
            <h3>{(props.data)[0].currency}</h3>
        </div>
    );
}
