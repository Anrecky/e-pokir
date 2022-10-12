import React, { useState, useEffect } from 'react'

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/inertia-react';
import { GoogleMap, useLoadScript, Marker } from '@react-google-maps/api'
import { Inertia } from '@inertiajs/inertia'

const proposalTypes = {
    BANSOS: "Bantuan Sosial", SAPRAS: "Sarana dan Prasarana", JALAN: "Jalan", BANGUNAN: "Bangunan", SALURAN: "Saluran", LAINNYA: "Lainnya"
}

export default function EditProposal(props) {

    const [proposal, setProposal] = useState(props.proposal);
    const { isLoaded } = useLoadScript({
        googleMapsApiKey: "AIzaSyB1RfubmU8QoLpabQ3tb7-_GwUIDPf5UT8"
    })

    const handleChange = e => {
        const { name, value, options } = e.target;
        if (name == 'users-input') {
            const optionValues = [...options].filter(x => x.selected).map(x => {

                const newIds = { id: x.value }
                return newIds;
            })

            setProposal(prevState => ({
                ...prevState,
                users: optionValues
            }));
            return;
        }
        setProposal(prevState => ({
            ...prevState,
            [name]: value
        }));
    }

    const handleClickGoogleMarker = e => {

        setProposal(prevState => ({
            ...prevState,
            latitude: e.latLng.lat(),
            longitude: e.latLng.lng()
        }));
    }

    const onHandleSubmit = (e) => {
        e.preventDefault()
        Inertia.put(route('usulan.update', proposal), proposal)
    }

    console.log(proposal)

    if (!isLoaded) return <div>Memuat...</div>;

    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
        >
            <Head title="Edit Usulan" />

            <div className="p-10">
                <h1 className='font-bold text-5xl mb-4 uppercase underline'>Form Edit Usulan</h1>
                <form onSubmit={onHandleSubmit}>
                    <div className="mb-6">
                        <label htmlFor={`title-${proposal.id}`} className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Judul</label>
                        <input type="text" id={`title-${proposal.id}`} onChange={handleChange} name="title" value={proposal.title} className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 max-w-4xl" required />
                    </div>
                    <div className="mb-6 w-full xl:w-1/2">
                        <h3 className="mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jenis Usulan</h3>
                        <ul className="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            {Object.keys(proposalTypes).map((val, index, row) => {
                                if (index == 0) {
                                    return (<li key={`proposal-types-radio-${index}`} className="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div className="flex items-center pl-3">
                                            <input onChange={handleChange} name="category" checked={val == proposal.category} id="horizontal-list-radio-license" type="radio" value={val} className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                            <label htmlFor="horizontal-list-radio-license" className="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{proposalTypes[val]}</label>
                                        </div>
                                    </li>)
                                }
                                if (index + 1 == row.length) {
                                    return (<li key={`proposal-types-radio-${index}`} className="w-full dark:border-gray-600">
                                        <div className="flex items-center pl-3">
                                            <input onChange={handleChange} name="category" checked={val == proposal.category} id="horizontal-list-radio-passport" type="radio" value={val} className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                            <label htmlFor="horizontal-list-radio-passport" className="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{proposalTypes[val]}</label>
                                        </div>
                                    </li>)
                                }
                                return (<li key={`proposal-types-radio-${index}`} className="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div className="flex items-center pl-3">
                                        <input onChange={handleChange} name="category" checked={val == proposal.category} id="horizontal-list-radio-id" type="radio" value={val} className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label htmlFor="horizontal-list-radio-id" className="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{proposalTypes[val]}</label>
                                    </div>
                                </li>)
                            })}
                        </ul>
                    </div>
                    <div className="mb-6">
                        <label htmlFor={`description-${proposal.id}`} className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deskripsi</label>
                        <textarea type="text" id={`description-${proposal.id}`} value={proposal.description} onChange={handleChange} name="description" rows="8" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 max-w-4xl" required></textarea>
                    </div>

                    <div className="mb-6 w-1/3">
                        <label htmlFor={`users-${proposal.id}`} className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pilih anggota dewan:</label>
                        <select id={`users-${proposal.id}`} name="users-input" value={proposal.users.map((user) => user.id)} onChange={handleChange} className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" multiple={true}>
                            {props.users.map((user, index) => <option key={`user-option-${index}`} value={user.id}>{user.name}</option>)}
                        </select>
                    </div>
                    <div className="mb-6">
                        <label htmlFor={`address-${proposal.id}`} className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat</label>
                        <textarea type="text" id={`address-${proposal.id}`} value={proposal.address} rows="5" name='address' onChange={handleChange} className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 max-w-4xl" required></textarea>
                    </div>

                    <div className="mb-6">
                        <div className="flex justify-start gap-10">
                            <div className='w-1/5'>
                                <label htmlFor={`title-${proposal.id}`} className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kuantitas/Nominal</label>
                                <input type="number" id={`title-${proposal.id}`} onChange={handleChange} name="quantity" value={proposal.quantity} className="bg-gray-2/6 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 max-w-4xl" required />
                            </div>
                            <div className="w-1/5">
                                <label htmlFor={`title-${proposal.id}`} className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Satuan</label>
                                <input type="text" id={`title-${proposal.id}`} value={proposal.unit} name="unit" onChange={handleChange} className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 max-w-4xl" required />
                            </div>
                        </div>
                    </div>
                    <div className="mb-6">
                        <label htmlFor={`map-${proposal.id}`} className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Google Maps</label>
                        <GoogleMap onClick={handleClickGoogleMarker} id={`map-${proposal.id}`} zoom={13} center={{ lat: Number(props.proposal.latitude), lng: Number(props.proposal.longitude) }} mapContainerClassName="map-container">
                            <Marker position={{ lat: Number(proposal.latitude), lng: Number(proposal.longitude) }} />
                        </GoogleMap>
                    </div>

                    <button type="submit" className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-lg font-bold w-full sm:w-auto px-10 py-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 uppercase">Ubah</button>
                </form>

            </div>
        </AuthenticatedLayout>
    );
}
