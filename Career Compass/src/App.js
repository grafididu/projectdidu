import './App.css';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Dashboard from './pages/dashboard';
import Navbar from './components/navbar';
import Vacancy from './pages/job-vacancy';
import Footer from './components/footer';
import { GlobalProvider } from "./context/GlobalContext";
import JobDetail from './pages/job-detail';

function App() {
  return (
    <>
      <Router>
        <GlobalProvider>
          <Navbar />
          <Routes>
            <Route path='/' element={<Dashboard />} />
            <Route path='/job-vacancy' element={<Vacancy />} />
            <Route path='/job-vacancy/:id' element={<JobDetail />} />
          </Routes>
          <Footer />
        </GlobalProvider>
      </Router>
    </>
  );
}

export default App;
