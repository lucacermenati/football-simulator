import StandingHeader from "./StandingHeaders";
import StandingRow from "./StandingRow";

export default function StandingTable({ competition, standings, onTeamClick }) {
    return (
        <div>
            <div className="grid items-center grid-cols-[1fr_auto_auto_auto_auto_auto_auto_auto_auto]">
                <StandingHeader />
                {standings.map((team, index) => (
                    <StandingRow
                        key={team.id}
                        team={team}
                        position={index + 1}
                        onTeamClick={onTeamClick}
                    />
                ))}
            </div>
            {/* TODO: make it configurable in competition settings */}
            <div className="flex justify-start items-center mt-8 space-x-6">
                <div className="flex justify-start items-center space-x-2">
                    <div className="w-4 h-4 bg-blue-500"></div>
                    <span>Champions League</span>
                </div>
                <div className="flex justify-start items-center space-x-2">
                    <div className="w-4 h-4 bg-yellow-500"></div>
                    <span>Europa League</span>
                </div>
                <div className="flex justify-start items-center space-x-2">
                    <div className="w-4 h-4 bg-green-500"></div>
                    <span>Conference League</span>
                </div>
                <div className="flex justify-start items-center space-x-2">
                    <div className="w-4 h-4 bg-orange-500"></div>
                    <span>Playout</span>
                </div>
                <div className="flex justify-start items-center space-x-2">
                    <div className="w-4 h-4 bg-red-500"></div>
                    <span>Relegation</span>
                </div>
            </div>
        </div>
    );
}
