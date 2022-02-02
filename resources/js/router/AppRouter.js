import React from "react";
import ReactDOM from 'react-dom';
import { BrowserRouter, Navigate, Route, Routes } from "react-router-dom";
import Home from "../components/home/Home";
import Footer from "../components/main/Footer";
import Header from "../components/main/Header";
import PageNotFound from "../components/main/PageNotFound";

const AppRouter = () => (
    <BrowserRouter>
            <Header />
            <Routes>
                <Route path='/' element={<Navigate replace to="/home" />} />
                <Route path='/home' element={<Home />} />
                <Route path='/*' element={<PageNotFound />} />
            </Routes>
            <Footer />
    </BrowserRouter>
);

export default AppRouter;

ReactDOM.render(<AppRouter />, document.getElementById('app'));
