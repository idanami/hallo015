import axios from "axios";
import React, { useEffect } from "react";

const Home = () => {

    useEffect(() => {
        const resOption = axios.get('/api/getPersonWithHighestSalary')
                          .then(res => {
                              console.log(res.data.highestSalary)
                          });
    }, [])
    
    return (
        <div>
        </div>
    )
};

export default Home;
