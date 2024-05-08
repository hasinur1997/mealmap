const StatCard = ({title, subTitle, value, icon}) => {
    const Icon = icon;

    const StatCardSkeleton = () => {
        return (
            <div className={'card'}>
				<div
					className={
						'flex-col items-center justify-center animate-pulse'
					}
				>
					<div
						className={'h-5 w-32 bg-slate-200 rounded'}
					/>

					<div
						className={
							'mt-2 h-2 w-32 bg-slate-200 rounded'
						}
					/>

					<div
						className={
							'mt-4 flex items-center justify-between'
						}
					>
						<div
							className={
								'h-10 w-16 bg-slate-200 rounded'
							}
						/>
						<div
							className={
								'bg-slate-200 px-5 py-5 rounded-md'
							}
						/>
					</div>
				</div>
			</div>
        );
    }

    const content = () => {
        return (
            <div className={'card'}>
				<div
					className={'flex-col items-center justify-center'}
				>
					<h1 className={'text-xl font-semibold'}>{title}</h1>

					<span
						className={
							'text-gray-600 text-sm font-thin mt-6'
						}
					>
						{subtitle}
					</span>

					<div
						className={
							'mt-4 flex items-center justify-between'
						}
					>
						<h1 className={'font-semibold text-4xl'}>
							{value}
						</h1>
						<div
							className={
								'bg-indigo-100 px-5 py-5 rounded-md'
							}
						>
							<Icon />
						</div>
					</div>
				</div>
			</div>
        );
    }

    return value ? content() : StatCardSkeleton();
}

export default StatCard;