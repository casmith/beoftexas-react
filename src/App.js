import React from 'react'
import Header from './Header'
import Footer from './Footer'
import Article from './Article'
import Navigation from './Navigation'
import { Container } from 'react-bootstrap'
import {
  BrowserRouter as Router,
  Switch,
  Route
} from "react-router-dom";
import './App.css'

function App() {
  return (
    <Router>
      <div className="wrapper">
        <Header />
        <Navigation />
        <Container className="container">
          <Switch>
            <Route path="/article/:id">
              <Article />
            </Route>
            <Route path="/">
              Home
              {/* <Home /> */}
            </Route>
          </Switch>
        </Container>
        <Footer />
      </div>
    </Router>
  );
}

export default App;
