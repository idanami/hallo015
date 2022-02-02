import React from "react";
import JobPopularityBarChart from "../chart/Chart";
import JobAvgHeightSalaryName from "../table/JobAvgHeightSalaryName";

const Home = () => (
    <div className="home-container">
        <section className="table-container">
            <JobAvgHeightSalaryName />
        </section>
        <section>
            <JobPopularityBarChart />
        </section>
    </div>
)

export default Home;
