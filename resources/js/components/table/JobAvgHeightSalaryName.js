import { nanoid } from "nanoid";
import React, { useEffect, useState } from "react";
import Loader from "../main/Loader";
import { fetchJobsAvgNameWithHighestSalaryData } from "../../server/DB";

const JobAvgHeightSalaryName = () => {
    const [jobsTable, setJobsTable] = useState(null);

    useEffect(() => {
        fetchJobsAvgNameWithHighestSalaryData()
            .then(tableData => {
                setJobsTable(tableData)
        });

    }, []);

    return (
        jobsTable ?
        (
            <>
                <h1>Jobs Table</h1>

                <table>
                    <thead>
                        <tr>
                            <th>Job</th>
                            <th>Avg salary</th>
                            <th>Person with highest salary</th>
                        </tr>
                    </thead>
                    <tbody>

                    {jobsTable.map((jobsTable) => (
                            <tr key={nanoid()}>
                                <td>{jobsTable.job}</td>
                                <td>{jobsTable.avrage}</td>
                                <td>{jobsTable.name}</td>
                            </tr>
                    ))}
                    </tbody>
                </table>
            </>
        )
        : <Loader />
    );
};

export default JobAvgHeightSalaryName;
