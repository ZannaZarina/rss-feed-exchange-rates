import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import ShowPreviousDates from "./PreviousDates";
import ShowPreviousRates from "./PreviousRates";
import ShowCurrencyName from "./Currency";
import BackButton from "./BackButton";

class History extends Component {
    constructor(props) {
        super(props);
        this.state = {
            currencyData: JSON.parse(props.data),
        }
        console.log(this.state.currencyData);
    }

    render() {
        let currencyData = this.state.currencyData;

        return (
            <div>
               <ShowCurrencyName data={currencyData}/>
               <br/><br/>
                <table className="table w-50 mx-auto text-center">
                    <thead>
                    <tr>
                        <ShowPreviousDates data={currencyData}/>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <ShowPreviousRates data={currencyData}/>
                    </tr>
                    </tbody>
                </table>
               <BackButton/>
            </div>
        )
    }
}

export default History;

if (document.getElementById('history')) {
    let data = document.getElementById('history')
        .getAttribute('data-history');
    ReactDOM.render(
        <History data={data}/>,
        document.getElementById('history')
    );
}
