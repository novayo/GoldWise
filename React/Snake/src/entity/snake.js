import React from 'react';

export default function Snake({ snakePosition }) {
    const snake = snakePosition.map((pos, i) => {
        return <div className="entity-body snake-body" key={i} style={{ top: pos[0].toString() + '%', left: pos[1].toString() + '%' }}></div>
    });

    return (
        <div>
            {snake}
        </div>
    );
}