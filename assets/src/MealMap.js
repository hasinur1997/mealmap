import {HashRouter as Router, Routes, Route} from 'react-router-dom';
import Dashboard from './pages/Dashborad';
import Report from './pages/Report';
import Order from './pages/Order';
import NotFound404 from './pages/NotFount404';
import './style/index.scss';

const MealMap = () => {
    return (
        <>
            <Router>
                <Routes>
                    <Route path="/dashboard" element={<Dashboard/>}/>
                    <Route path="/reports" element={<Report/>}/>
                    <Route path="/orders" element={<Order/>}/>
                    <Route path="/404" element={<NotFound404/>}/>
                </Routes>
            </Router>
        </>
    )
}

export default MealMap;