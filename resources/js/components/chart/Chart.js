import { nanoid } from 'nanoid';
import React, { useState, useEffect } from 'react';
import Loader from '../main/Loader';
import { fetchJobsPopularityData } from '../../server/DB';

const JobPopularityBarChart = () => {
    const [jobPopularities, setJobPopularities] = useState(null);
    const [mostPopularJobNum, setMostPopularJobNum] = useState(0);

    const findMostPopularJobNum = (data) => {
        let maxPopularJobNum = 0;
        data.forEach((job) => {
            if (job.popularity > maxPopularJobNum) maxPopularJobNum = job.popularity;
        });

        return maxPopularJobNum;
    };

    useEffect(() => {
        fetchJobsPopularityData()
            .then((response) => {
                const data = response;
                const max = findMostPopularJobNum(response);

                setJobPopularities(data);
                setMostPopularJobNum(max);

            })
    }, []);

    return !jobPopularities ? (
        <Loader />
    ) : (
        <>
            <h1>Job Popularity Chart</h1>
            <div className="bar-chart">
                {jobPopularities.map((job) => {
                    const height = parseInt((job.popularity / mostPopularJobNum) * 200);
                    return (
                        <div key={nanoid()} className={'bar-container'}>
                            <span className="title">{job.jobName}</span>

                            <div className="bar" style={{ height: `${height}px` }}></div>

                            <span className="popularity">{job.popularity}</span>
                        </div>
                    );
                })}
            </div>
        </>
    );
};

export default JobPopularityBarChart;
