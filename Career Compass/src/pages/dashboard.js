import React from 'react';

const Dashboard = () => {
  return (
    <div className="grid grid-cols-1 h-auto bg-[#373737] text-white relative">
      <div className="absolute top-0 left-0 w-full h-full bg-[#2B2B2B] z-0" style={{ clipPath: 'polygon(0 0, 100% 0, 0 100%)' }}></div>
       <div className="absolute mt-20 top-0 right-0 h-96 w-96 bg-gradient-to-r from-[#F4CE14] to-[#F49A14] rounded-l-xl">
       <img src="./orang.svg" alt="Logo" className="mx-auto h-96" />
       </div>
      
      <div className="relative z-10 ml-24 mt-3/4">
        <div className="mt-24 w-2/5 bg-transparent rounded-lg float-left">
          <h1 className="text-5xl font-bold mb-2 text-[#F4CE14]">
            Guiding You
          </h1>
          <h1 className="text-5xl font-bold mb-6 text-[#F4CE14]">
            to Your Perfect Job!
          </h1>
          <p className="text-xl text-justify">
            Your Ultimate Guide in the Sea of Opportunities. Navigate your career path with ease and confidence, and set sail towards your dream job. With Career Compass, finding your true north in the job market has never been easier!
          </p>
          <button type="button" className="mt-6 text-black bg-[#F4CE14] hover:bg-[#CAAD1E] focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
            Get Started
            <svg className="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
          </button>
        </div>
      </div>

      <div className="mt-24 relative z-10">
        <img src="./single-logo.svg" alt="Logo" className="mx-auto w-28 h-28 drop-shadow-xl" />
        <div className="w-3/5 bg-transparent rounded-lg mx-auto">
          <div className="mt-6 text-2xl text-center font-normal italic drop-shadow-xl">
            “Career Compass has propelled my career to new heights with its tailored job matches. It's been an invaluable partner in achieving my goals.”
          </div>
          <img src="./ava.svg" alt="Logo" className="mt-8 mx-auto w-12 h-12" />
          <div className="mt-2 text-md text-center font-semibold text-[#F4CE14] drop-shadow-xl">
            Alfonso Phillips
          </div>
          <div className="mb-6 text-md text-center text-white drop-shadow-xl">
            Project Manager at OpenBracket
          </div>
          <div className="mt-32 bg-transparent w-full flex items-center justify-center py-4">
            <h1 className="text-4xl text-white font-bold drop-shadow-xl mb-2">Job Categories</h1>
          </div>
          <div className="flex justify-between p-4 mb-32">
            <div className="bg-transparent w-auto h-auto rounded-lg flex flex-col justify-center items-center overflow-hidden">
              <div className="bg-[#F4CE14] w-12 h-12 rounded-xl flex flex-col justify-center items-center overflow-hidden px-3 py-3">
                <img src="./engineering.svg" alt="Category 5" className="object-cover w-auto h-auto" />
              </div>
              <span className="text-md text-white mt-2 font-semibold">Engineering</span>
            </div>
            <div className="bg-transparent w-auto h-auto rounded-lg flex flex-col justify-center items-center overflow-hidden">
              <div className="bg-[#F4CE14] w-12 h-12 rounded-xl flex flex-col justify-center items-center overflow-hidden px-4 py-">
                <img src="./ui.svg" alt="Category 5" className="object-cover w-auto h-auto" />
              </div>
              <span className="text-md text-white mt-2 font-semibold">UI/UX</span>
            </div>
            <div className="bg-transparent w-auto h-auto rounded-lg flex flex-col justify-center items-center overflow-hidden">
              <div className="bg-[#F4CE14] w-12 h-12 rounded-xl flex flex-col justify-center items-center overflow-hidden px-3 py-3">
                <img src="./programmer.svg" alt="Category 5" className="object-cover w-auto h-auto" />
              </div>
              <span className="text-md text-white mt-2 font-semibold">Programmer</span>
            </div>
            <div className="bg-transparent w-auto h-auto rounded-lg flex flex-col justify-center items-center overflow-hidden">
              <div className="bg-[#F4CE14] w-12 h-12 rounded-xl flex flex-col justify-center items-center overflow-hidden px-3 py-3">
                <img src="./finance.svg" alt="Category 5" className="object-cover w-auto h-auto" />
              </div>
              <span className="text-md text-white mt-2 font-semibold">Finance</span>
            </div>
            <div className="bg-transparent w-auto h-auto rounded-lg flex flex-col justify-center items-center overflow-hidden">
              <div className="bg-[#F4CE14] w-12 h-12 rounded-xl flex flex-col justify-center items-center overflow-hidden px-3 py-3">
                <img src="./design.svg" alt="Category 5" className="object-cover w-auto h-auto" />
              </div>
              <span className="text-md text-white mt-2 font-semibold">Design</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Dashboard;
