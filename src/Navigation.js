import React from 'react';
import { Navbar, Nav, NavDropdown } from "react-bootstrap"

const menu = {
  'Flexibile Spendingsdfafsd': [
    {'Flexibile Spending': '/blah'},
    {"TASC&trade; Debit Card": "mbicard.php"},
      {"Direct Deposit": "ddreim.php"},
      {"Flex Worksheet": "flexreim.php"},
      {"Check Balance": "checkbal.php"},
      {"Request Quote": "request_quote.php"},
      {"Q&As": null},
      {"Cafeteria Plan": "questions.php?category=cafeteria"},
      {"Debit Card": "questions.php?category=debitcard"},
      {"DCRP": "questions.php?category=dcrp"},
      {"HCRP": "questions.php?category=hcrp&amp;image=stetho.gif"}
  ], 
  '403(b) Admin': {},
  'COBRA Admin': {},
  'Forms': {},
  'Billing': []
};

const renderHtml = (rawHTML) => React.createElement("span", { dangerouslySetInnerHTML: { __html: rawHTML } });

const renderSubmenu = (submenu) => {
  return (
    <>
      {submenu.map(obj => {
        const label = Object.keys(obj)[0],
          href = obj[label];
        return (<NavDropdown.Item href={href}>{renderHtml(label)}</NavDropdown.Item>)
      })}
    </>
  )
}

export default function Navigation() {
    return (
      <Navbar expand="sm">
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="mr-auto">
            {Object.keys(menu).map(key => {
              const submenu = menu[key];
              if (submenu && submenu.length) {
                return (
                  <NavDropdown title="Flexible Spending" id="basic-nav-dropdown">
                  {renderSubmenu(submenu)}
                  </NavDropdown>
                  )
              } else {
                return (<Nav.Link href="#home">{key}</Nav.Link>)
              }
            })}
          </Nav>
        </Navbar.Collapse>
      </Navbar>
    );
}
