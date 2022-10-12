import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Link, Head } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia'


import { BsPrinter } from 'react-icons/bs'


export default function Proposal(props) {

    const handlePaginateChange = (e) => {
        Inertia.get(route('proposals', e.target.value))
    }

    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Usulan" />

            <div className="py-6 px-5">
                <div className='flex justify-between pb-8'>
                    <div>
                        Tampilkan per <select onChange={handlePaginateChange} value={props.paginateNumber ? props.paginateNumber : 10}>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> data
                    </div>
                    <a href={route('download.proposals')} className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                        <BsPrinter />
                        <span className='ml-2 font-bold'>Cetak</span>
                    </a>
                </div>
                <div className="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table className="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" className="py-3 px-6">
                                    No
                                </th>
                                <th scope="col" className="py-3 px-6">
                                    Tgl Usul
                                </th>
                                <th scope="col" className="py-3 px-6">
                                    Pengusul
                                </th>
                                <th scope="col" className="py-3 px-6">
                                    Fraksi
                                </th>
                                {/* <th scope="col" className="py-3 px-6">
                                    Urusan
                                </th> */}
                                <th scope="col" className="py-3 px-6">
                                    Usulan
                                </th>
                                <th scope="col" className="py-3 px-6">
                                    Permasalahan
                                </th>
                                <th scope="col" className="py-3 px-6">
                                    Alamat
                                </th>
                                {/* <th scope="col" className="py-3 px-6">
                                    Kecamatan
                                </th>
                                <th scope="col" className="py-3 px-6">
                                    Kelurahan
                                </th> */}
                                <th scope="col" className="py-3 px-6">
                                    Koefisien
                                </th>
                                <th scope="col" className="py-3 px-6">
                                    Koordinat <br />(lintang, bujur)
                                </th>
                                <th scope="col" className="py-3 px-6">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {props.proposals.data ? props.proposals.data.map((proposal, i) => <tr key={`proposal${proposal.id}ID`} className="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td className="py-4 px-6">
                                    {(props.proposals.current_page - 1) * props.proposals.per_page + (i + 1)}
                                </td>
                                <td className="py-4 px-6">
                                    {proposal.created_at}
                                </td>
                                <td className="py-4 px-6">
                                    <ul>
                                        {proposal.users.map((user, index) => <li key={`${user}-${index}-pengusul`}>{index + 1}. {user.name}</li>)}
                                    </ul>
                                </td>
                                <td className="py-4 px-6">
                                    <ul>
                                        {proposal.users.map((user, index) => <li key={`${user}-${index}-pengusul`}>{index + 1}. {user.fraction.name}</li>)}
                                    </ul>
                                </td>
                                <td className="py-4 px-6 break-all">
                                    {proposal.title}
                                </td>
                                <td className="py-4 px-6 break-all">
                                    {proposal.description.length > 40 ?
                                        `${proposal.description.substring(0, 40)}...` : proposal.description
                                    }
                                </td>
                                <td className="py-4 px-6">
                                    {proposal.address}
                                </td>
                                <td className="py-4 px-6">
                                    {proposal.quantity} {proposal.unit}
                                </td>
                                <td className="py-4 px-6">
                                    ({proposal.latitude} {proposal.longitude})
                                </td>
                                <td className="py-4 px-6">

                                    <div className="inline-flex rounded-md shadow-sm" role="group">
                                        <Link href={route('usulan.edit', proposal)} className="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            Edit
                                        </Link>
                                        <button type="button" className="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>) : <p>Tidak ada data!</p>}

                        </tbody>
                    </table>

                    <nav className="flex justify-between items-center pt-4 px-4 pb-4" aria-label="Table navigation">
                        <span className="text-sm font-normal text-gray-500 dark:text-gray-400">Menampilkan <span className="font-semibold text-gray-900 dark:text-white">{props.proposals.from}-{props.proposals.to}</span> dari <span className="font-semibold text-gray-900 dark:text-white">{props.proposals.total}</span></span>
                        <ul className="inline-flex items-center -space-x-px">
                            {props.proposals.links.map(function (link, i, row) {
                                if (i == 0) {

                                    return (<li key={`link-prev`}>
                                        <Link href={link.url} className="block py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span className="sr-only">Sebelumnya</span>
                                            <svg className="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clipRule="evenodd"></path></svg>
                                        </Link>
                                    </li>)
                                }
                                if (i + 1 == row.length) {
                                    return (<li key={`link-next`}>
                                        <Link href={link.url} disabled={props.proposals.current_page == props.proposals.last_page ? true : false} className={`block py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white ${props.proposals.current_page == props.proposals.last_page ? "cursor-not-allowed" : ""}`}>
                                            <span className="sr-only">Selanjutnya</span>
                                            <svg className="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>
                                        </Link>
                                    </li>)
                                }

                                return (<li key={`link-pag-${i}`}>
                                    <Link href={link.url} className={link.active ? "text-blue-600 py-2 px-3 leading-tight bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white" : "py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"}>{link.label}</Link>
                                </li>)

                            })}

                        </ul>
                    </nav>
                </div>

            </div>
        </AuthenticatedLayout>
    );
}
