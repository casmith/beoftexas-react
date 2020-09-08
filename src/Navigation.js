import React from 'react';
import { Navbar, Nav, NavDropdown } from "react-bootstrap"

const menu = {
  'Flexibile Spending': [
    {'Flexibile Spending': '/article/1'},
    {"TASC&trade; Debit Card": "/article/4"},
      {"Direct Deposit": "/article/5"},
      {"Flex Worksheet": "flexreim.php"},
      {"Check Balance": "/article/6"},
      {"Request Quote": "request_quote.php"},
      {"Q&As": null},
      {"Cafeteria Plan": "questions.php?category=cafeteria"},
      {"Debit Card": "questions.php?category=debitcard"},
      {"DCRP": "questions.php?category=dcrp"},
      {"HCRP": "questions.php?category=hcrp&amp;image=stetho.gif"}
  ], 
  '403(b) Admin': '/403badmin',
  'COBRA Admin': '/article/7',
  'Forms': '/forms',
  'Billing': '/billing'
};

const renderHtml = (rawHTML) => React.createElement("span", { dangerouslySetInnerHTML: { __html: rawHTML } });

const renderSubmenu = (submenu) => {
  return (
    <>
      {submenu.map((obj, i) => {
        const label = Object.keys(obj)[0],
          href = obj[label];
        return (<NavDropdown.Item key={i} href={href}>{renderHtml(label)}</NavDropdown.Item>)
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
            {Object.keys(menu).map((key, i) => {
              const submenu = menu[key];
              if (Array.isArray(submenu) && submenu.length) {
                return (
                  <NavDropdown key={i} title="Flexible Spending">
                  {renderSubmenu(submenu)}
                  </NavDropdown>
                  )
              } else if (submenu.length) {
                return (<Nav.Link key={i} href={submenu}>{key}</Nav.Link>)
              } else {
                return null;
              }
            })}
          </Nav>
        </Navbar.Collapse>
      </Navbar>
    );
}
