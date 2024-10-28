import React from 'react';
import {createRoot} from 'react-dom/client';
import {LicenseActivation} from '@paidcommunities-wp/components';

const App = () => {
    return (
        <LicenseActivation config={awesomeSEOParams}/>
    )
}

const root = createRoot(document.getElementById('app'));

root.render(<App/>);