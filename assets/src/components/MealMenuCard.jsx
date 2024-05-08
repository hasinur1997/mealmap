const MealMenuCard = ({ mealMenu, onClick, selected }) => {
    return (
        <>
            <div
                onClick={onClick}
                className={`rounded-md border-2 border-slate-100 shadow-sm p-3 mt-4 cursor-pointer transition-eo hover:border-slate-600 ${selected ? 'bg-indigo-50' : ''
                    }`}
            >
                <p className={'font-semibold text-lg'}>{mealMenu.name}</p>
                <div className={'text-gray-600 text-sm mt-2'}>
                    {mealMenu.description}
                </div>
                <p className={'font-semibold text-base mt-6'}>
                    {mealMenu.formatted_price}
                </p>
            </div>
        </>
    );
}

export default MealMenuCard;