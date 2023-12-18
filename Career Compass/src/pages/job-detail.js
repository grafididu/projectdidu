import React from "react";
import { useGlobalContext } from "../context/GlobalContext";
import { useParams } from "react-router-dom";
import Vacancy from "./job-vacancy";

const JobDetail = () => {
    const { data, formatter } = useGlobalContext();
    const { id } = useParams();
  
    const jobId = parseInt(id);
    const selectedJob = data.find((job) => job.id === jobId);
  
    if (!selectedJob) {
      return <div>Loading...</div>;
    }

  const statusClass = selectedJob.job_status === 1 ? 'text-green-600' : 'text-red-600';
  const labelClass = 'font-semibold';

  return (
    <div className="bg-[#2B2B2B] flex flex-col items-center relative">
      <div className="bg-white rounded-xl shadow-lg grid grid-cols-3 w-5/6 relative mt-12 px-6 py-6">
        <div className="col-span-1 flex w-5/6 h-full">
          <img
            src={selectedJob.company_image_url}
            alt="Company Logo"
            className="rounded-lg object-cover mr-4 w-full h-full"
          />
        </div>
        <div className="col-span-2 relative">
          <h1 className="text-2xl font-bold">{selectedJob.title}</h1>
          <p className="font-semibold">({selectedJob.job_type})</p>
          <p className={`mb-2 text-lg ${labelClass}`}>
             {selectedJob.company_name} - {selectedJob.company_city}
          </p>
          <p className={`${labelClass}`}>Status: <span className={statusClass}>{selectedJob.job_status === 1 ? "Open" : "Closed"}</span></p>
          <p className={`${labelClass}`}>Description: <span className="font-normal">{selectedJob.job_description}</span></p>
          <p className={`${labelClass}`}>Qualification: <span className="font-normal">{selectedJob.job_qualification}</span></p>
          <p className={`${labelClass}`}>Salary:
            <span className="font-normal"> {formatter.format(selectedJob.salary_min)} - {formatter.format(selectedJob.salary_max)}</span>
          </p>
        </div>
      </div>
      <Vacancy/>
    </div>
  );
};

export default JobDetail;
