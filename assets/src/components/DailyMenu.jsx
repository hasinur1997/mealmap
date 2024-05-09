import { __ } from "@wordpress/i18n";
import { useEffect, useState } from "@wordpress/element";
import MealMenuCard from "./MealMenuCard";
import { toast } from "react-toastify";

const DailyMenu = () => {
    const [mealMenus, setMealMenus] = useState(null);
    const [canPlaceOrder, setCanPlaceOrder] = useState(false);
    const [selectedMealMenu, setSelectedMealMenu] = useState(null);

    const handleMealMenuClick = (mealId) => {
        setSelectedMealMenu(mealId);
    }

    const handlePlaceOrderClick = () => {
        const orderData = {
            mealId: selectedMealMenu
        }

        if ( selectedMealMenu ) {
            
        }
    }

    const renderMealMenus = () => {
        return mealMenus.map((mealMenu) => {
            return (
                <MealMenuCard
                    key={mealMenu.id}
                    mealMenu={mealMenu}
                    selected={selectedMealMenu == mealMenu.id}
                    onClick={() => handleMealMenuClick(mealMenu.id)}
                />
            );
        });
    }

    const renderPlaceOrderButton = () => {
        if (canPlaceOrder) {
            return (
                <button
                    className={`button-primary ${selectedMealMenu ? '' : 'disabled'
                        }`}
                    onClick={handlePlaceOrderClick}
                >
                    {__('Place Order', 'meal-map')}
                </button>
            );
        }

        return (
            <button
                className="button-primary disabled">
                {__('Order Placed', 'meal-map')}
            </button>
        );
    }

    const mealMenuCardSkeleton = () => {
        return (
            <>
                <div className={'card'}>
                    <div
                        className={'flex items-center justify-between'}
                    >
                        <div
                            className={
                                'h-5 w-32 bg-slate-200 rounded'
                            }
                        />
                        <div
                            className={
                                'h-8 w-24 bg-slate-200 rounded'
                            }
                        />
                    </div>

                    <div
                        className={
                            'animate-pulse border-2 rounded-md p-4 mt-4 border-slate-100'
                        }
                    >
                        <div
                            className={
                                'h-5 w-32 bg-slate-200 rounded'
                            }
                        />
                        <div
                            className={
                                'mt-2 h-2 w-32 bg-slate-200 rounded'
                            }
                        />
                        <div
                            className={
                                'mt-6 h-2 w-32 bg-slate-200 rounded'
                            }
                        />
                    </div>
                </div>
            </>
        );
    };

    return (
        <>
            {mealMenus ? (
                <div className="card">
                    <div
                        className={'flex items-center justify-between'}
                    >
                        <h1 className={'text-xl font-semibold'}>
                            {__("Today's Menu", 'meal-map')}
                        </h1>
                        {renderPlaceOrderButton()}
                    </div>

                    {renderMealMenus()}

                </div>
            ) : (
                mealMenuCardSkeleton()
            )}
        </>
    );
}

export default DailyMenu;