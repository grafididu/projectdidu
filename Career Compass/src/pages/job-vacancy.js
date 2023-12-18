import React from "react";
import { useGlobalContext } from "../context/GlobalContext";
import { Link } from "react-router-dom";


function Vacancy() {
    const { data } = useGlobalContext();
        
    return(
        <div className="bg-[#373737] flex flex-col items-center relative">
        <div className="absolute top-0 left-0 w-full h-full bg-[#2B2B2B] z-0" style={{ clipPath: 'polygon(0 0, 100% 0, 0 100%)' }}></div>
        <h1 className="text-[#F4CE14] text-5xl font-bold mt-12 mb-3 z-10">Find Your Perfect Job!</h1>
        <div className="grid grid-cols-3 gap-10 p-10">
            {Array.isArray(data) && data.map((res) => {
                return(
                    <div key={res.id} className="bg-white rounded-xl shadow-lg grid grid-cols-3 h-auto relative px-6 py-2">
                        <div className="col-span-1 flex items-center justify center w-32">
                            <img
                                src={res.company_image_url}
                                alt="Company Image"
                                className="rounded-lg object-cover w-32 h-48"
                                style={{ maxHeight: "100%" }}
                            />
                        </div>
                        <div className="col-span-2 px-2 py-6 relative ml-5">
                            <p className="text-xl font-bold mb-1">{res.title}</p>
                            <p className="text-sm mb-2 font-medium">{res.company_name}</p>
                            <p className="text-sm mb-2 flex items-center">
                            <svg 
                            className="mr-1"
                            xmlns="http://www.w3.org/2000/svg" 
                            width="24" 
                            height="24" 
                            viewBox="0 0 24 24" 
                            fill="none" 
                            stroke="#F4CE14" 
                            stroke-width="2.5" 
                            stroke-linecap="round" 
                            stroke-linejoin="round"><circle cx="12" cy="10" r="3"/><path d="M12 21.7C17.3 17 20 13 20 10a8 8 0 1 0-16 0c0 3 2.7 6.9 8 11.7z"/>
                            </svg>
                                {res.company_city}
                            </p>
                            <p className="text-sm mb-2 flex items-center">
                            <svg 
                            className="mr-1"
                            xmlns="http://www.w3.org/2000/svg" 
                            width="24" height="24" 
                            viewBox="0 0 24 24" fill="none" 
                            stroke="#F4CE14" 
                            stroke-width="2.5" 
                            stroke-linecap="round" 
                            stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                                {res.job_type}
                            </p>
                            <Link to={`/job-vacancy/${res.id}`}>
                            <button type="button" 
                            className="mt-6 ml-1 text-black bg-[#F4CE14] hover:bg-[#CAAD1E] focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                Detail
                                <svg className="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </button>
                            </Link>
                        </div>
                    </div>
                )
            })}
        </div>
    </div>
    )
}

export default Vacancy
