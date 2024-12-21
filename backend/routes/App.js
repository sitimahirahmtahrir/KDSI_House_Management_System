import Houses from "./components/Houses";
import Maintenance from "./components/Maintenance";

function App() {
    return (
        <Router>
            <Routes>
                <Route path="/houses" element={<Houses />} />
                <Route path="/maintenance" element={<Maintenance />} />
            </Routes>
        </Router>
    );
}
