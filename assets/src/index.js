import {createRoot} from '@wordpress/element';
import MealMap from './MealMap';
import menuFix from './utils/menu-fix';
const root = createRoot(document.getElementById('meal-map'));

root.render(<MealMap/>, );

menuFix('meal-map');

