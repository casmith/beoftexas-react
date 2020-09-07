import React from 'react';
import image from './header-flipped.gif'

export default function Header() {
    return (
        <div class="header"><img src={image} alt="Logo" /></div>
    );
}