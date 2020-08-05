import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Pagination from "react-js-pagination";
import LastUpdate from "./LastUpdate";
import GenerateTableData from "./TableData";
import TableHeader from "./TableHeader";

class Rates extends Component {
    constructor(props) {
        super(props);
        this.state = {
            data: JSON.parse(props.data),
            itemsPerPage: 15,
            activePage: 1,
            currentPageData: [],
        };
        this.handlePageClick = this.handlePageClick.bind(this);
    }

    componentDidMount() {
        let currentPageData = this.state.data.slice(0, this.state.itemsPerPage);
        this.setState({
            currentPageData
        });
    }

    handlePageClick(pageNumber) {
        let indexOfLastItem = pageNumber * this.state.itemsPerPage;
        let indexOfFirstItem = indexOfLastItem - this.state.itemsPerPage;
        let data = this.state.data.slice(indexOfFirstItem, indexOfLastItem);

        this.setState({
            currentPageData: data,
            activePage: pageNumber
        });
    }

    render() {
        return (
            <div className="container">
                <div>
                    <LastUpdate date={this.state.data[0].date}/>
                    <br/><br/>
                    <div>
                        <table className="table table-hover">
                            <thead><TableHeader/></thead>
                            <tbody>
                            <GenerateTableData data={this.state.currentPageData}/>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div className="d-flex justify-content-center">
                    <Pagination
                        activePage={this.state.activePage}
                        itemsPerPage={this.state.itemsPerPage}
                        totalItemsCount={this.state.data.length}
                        pageRangeDisplayed={3}
                        onChange={this.handlePageClick}
                    />
                </div>
            </div>
        );
    }
}

export default Rates;

if (document.getElementById('rates')) {
    let data = document.getElementById('rates')
        .getAttribute('data-rates');
    ReactDOM.render(
        <Rates data={data}/>,
        document.getElementById('rates')
    );
}
