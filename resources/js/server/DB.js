
export const fetchJobsAvgNameWithHighestSalaryData = async () => {
    try {
        let tableData = [];
        const responseJobAndAvg = await fetch("/api/getJobsAndAverageSalary")
        const data = await responseJobAndAvg.json();

        for (let id in data.jobsAndAvgSalary) {
            const responseHeightSalaryByJob = await fetch("/api/getPersonWithHighestSalary/" + data.jobsAndAvgSalary[id].job);
            const highestSalaryData = await responseHeightSalaryByJob.json();

            tableData.push({
                id,
                job: data.jobsAndAvgSalary[id].job,
                avrage: data.jobsAndAvgSalary[id].salary,
                name: highestSalaryData.highestSalary[0].name
            });
        }
        return tableData;
    } catch(err) {
        return err;
    }
};

export const fetchJobsPopularityData = async () => {
    try {
        const response = await fetch("/api/getJobsByPopularity")
        const data = await response.json();

        return data.jobsByPopularity;
    } catch(err) {
        return err;
    }
}
