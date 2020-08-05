import React from 'react';

export default function ShowPreviousDates(props) {
    let history = [];

    for (let i = (props.data).length - 1; i >= 0; i--) {
        history.push(
            <th key={(props.data)[i].id}>
                {(props.data)[i].date}
            </th>
        )
    }
    return history
}
