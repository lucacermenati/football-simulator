import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";
import StandingRow from "./Components/StandingRow";

export default function CompetitionStandings({ competition, standings }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="px-8 py-8">
                    <div className="grid grid-cols-[1fr_auto_auto_auto_auto_auto_auto_auto_auto] gap-x-2 items-center">
                        <div className="grid col-span-9 mb-2 grid-cols-subgrid">
                            <div>Team</div>
                            <div className="px-4">M</div>
                            <div className="px-4">W</div>
                            <div className="px-4">D</div>
                            <div className="px-4">L</div>
                            <div className="px-4">G</div>
                            <div className="px-4">GA</div>
                            <div className="px-4">GD</div>
                            <div className="px-4 font-semibold text-primaryRed-700">
                                Pts
                            </div>
                        </div>
                        {standings.map((team, index) => (
                            <StandingRow
                                team={team}
                                position={index + 1}
                                key={team.id}
                            />
                        ))}
                    </div>
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
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
