export default function StandingHeader() {
    return (
        <div className="grid col-span-9 mb-2 grid-cols-subgrid">
            <div>Team</div>
            <div className="px-4">M</div>
            <div className="px-4">W</div>
            <div className="px-4">D</div>
            <div className="px-4">L</div>
            <div className="px-4">G</div>
            <div className="px-4">GA</div>
            <div className="px-4">GD</div>
            <div className="px-4 font-semibold text-primaryRed-700">Pts</div>
        </div>
    );
}
