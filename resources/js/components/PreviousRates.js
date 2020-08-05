import React from 'react';

export default function ShowPreviousRates(props) {
    let history = [];

    for (let i = (props.data).length - 1; i >= 0; i--) {
        history.push(
            <td key={(props.data)[i].id}>
                {(props.data)[i].rate}
            </td>
        )
    }
    return history
}
