import React from 'react';

export default function GenerateTableData(props) {
    return (
        (props.data).map(i => (
            <tr key={i.id} className="text-center">
                <td key={i.id} >
                    <a href={`${i.id}`} >
                        <img
                            src={`https://fxtop.com/ico/${i.currency}.gif`}
                            alt="flag icon"
                        />
                    </a>
                </td>
                <td key={i.currency}>
                    <a href={`${i.id}`} style={{color: 'black'}}>
                        {i.currency}
                    </a>
                </td>
                <td key={i.rate}>{i.rate}</td>
            </tr>
        ))
    );
}
