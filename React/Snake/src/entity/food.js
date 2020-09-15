import React from 'react';

export default function Food({ foodPosition }) {
    const food = foodPosition.map((pos, i) => {
        return <div className="entity-body food-body" key={i} style={{ top: pos[0].toString() + '%', left: pos[1].toString() + '%' }}></div>
    });

    return (
        <div>
            {food}
        </div>
    );
}