import React from 'react'
import { Link } from '@inertiajs/inertia-react';

import logo from '../../images/logo-pukat.png'

import { GoFile, GoDashboard } from 'react-icons/go';
import { BsPeople } from 'react-icons/bs';
import { BiLandscape } from 'react-icons/bi';
import { HiOutlineUserGroup } from 'react-icons/hi';

export default function Sidebar() {

    const menus = [
        {
            name: 'DASHBOARD',
            link: route('dashboard'),
            routeNamed: 'dashboard',
            logo: <GoDashboard size={50} />
        },
        {
            name: 'USULAN',
            link: route('proposals'),
            routeNamed: 'proposals',
            logo: <GoFile size={50} />
        },
        {
            name: 'WILAYAH',
            link: route('dashboard'),
            routeNamed: "pesan",
            logo: <BiLandscape size={50} />
        },
        {
            name: 'FRAKSI',
            link: route('dashboard'),
            routeNamed: "pesan",
            logo: <HiOutlineUserGroup size={50} />
        },
        {
            name: 'RAKYAT',
            link: route('dashboard'),
            routeNamed: "rakyat",
            logo: <BsPeople size={50} />
        },
    ]

    return (
        <div className='w-60'>
            <div className="flex flex-col items-center h-56 justify-center ">
                <img src={logo} alt="Logo Pukat" className='w-3/5' />
                <h2 className='text-3xl font-bold'>PUKAT</h2>
            </div>
            <ul className='space-y-2 mt-5 px-5'>
                {menus.map((menu, index) => <li key={`menu-${index}`}><Link href={menu.link} className={`${route().current(menu.routeNamed) ? 'bg-amber-200 hover:bg-amber-300' : 'hover:bg-amber-200'} rounded-md flex items-center p-2 duration-100 ease-in-out transform`}>
                    {menu.logo} <span className='ml-3 font-bold text-xl'>{menu.name}</span>
                </Link>

                </li>)}
            </ul>
        </div>
    )
}
