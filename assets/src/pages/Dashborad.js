import { useEffect } from "@wordpress/element";
import Api from "../api";
import MealCalendar from "../components/MealCalendar";

const Dashboard = () => {

    useEffect( () => {
        const response = Api.get('posts?per_page=5');

        response.then((data) => {
            console.log(data);
        });
    }, []);

    return (
        <>
            <>
			<div className={'container mx-auto px-6 py-4'}>
				<div
					className={
						'grid grid-cols-1 md:grid-cols-2 gap-4'
					}
				>
					<div className={'col-span-1'}>
						{/* <Stat /> */}
						<div className={'mt-4'}>
							{/* <DailyMenu /> */}
						</div>
					</div>
					<div className={'col-span-1'}>
						<MealCalendar />
					</div>
				</div>
			</div>
		</>
        </>
    )
}

export default Dashboard;