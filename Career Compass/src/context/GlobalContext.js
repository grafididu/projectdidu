import React, { createContext, useContext, useState, useEffect } from "react";
import axios from "axios";

const GlobalContext = createContext();

export const useGlobalContext = () => {
  return useContext(GlobalContext);
};

export const GlobalProvider = ({ children }) => {
  const [data, setData] = useState([]);

  const formatter = new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
  });

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get(
          "https://dev-example.sanbercloud.com/api/job-vacancy"
        );
        if (Array.isArray(response.data.data)) {
          setData(response.data.data);
        } else {
          console.error(
            "Error: Expected array but received",
            typeof response.data.data
          );
        }
      } catch (error) {
        console.error("Error Fetching data:", error);
      }
    };
    fetchData();
  }, []);

  return (
    <GlobalContext.Provider value={{ data, formatter }}>
      {children}
    </GlobalContext.Provider>
  );
};
