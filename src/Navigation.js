import React, { useState, useEffect } from 'react';
import { Navbar, Nav, NavDropdown } from "react-bootstrap"



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
  const [error, setError] = useState(null);
  const [isLoaded, setIsLoaded] = useState(false);
  const [menu, setMenu] = useState([]);

  useEffect(() => {
    fetch(`http://localhost:8080/menus`)
      .then(res => res.json())
      .then(
        ({data}) => {
          setIsLoaded(true);
          const newMenu = {};
          const rootMenuItems = data.filter(i => !i.parent);
          const childMenuItems = data.filter(i => !!i.parent);
          const getMenuItems = (rootMenuItem) => childMenuItems
            .filter(i => i.parent === rootMenuItem.id)
            .map((i) => ({[i.title]: i.link}));
          rootMenuItems
            .forEach(m => newMenu[m.title] = m.link ? m.link : getMenuItems(m));
          setMenu(newMenu);
        },
        (error) => {
          setIsLoaded(true);
          setError(error);
        }
      )
  }, [])

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
