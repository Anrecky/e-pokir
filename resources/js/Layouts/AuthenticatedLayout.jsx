import Sidebar from '@/Components/Sidebar';
import Header from '@/Components/Header';
import React from 'react';

export default function Authenticated({ auth, children }) {

    return (
        <div className="min-h-screen w-full bg-white flex">
            <Sidebar />
            <div className='flex-auto'>
                <Header auth={auth} />
                <main>{children}</main>
            </div>
        </div>
    );
}
