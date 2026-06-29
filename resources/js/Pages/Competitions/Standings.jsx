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
                    <div className="grid grid-cols-[1fr_auto_auto_auto] gap-x-2 items-center">
                        <div>Team</div>
                        <div>M</div>
                        <div>G</div>
                        <div className="font-semibold">Pts</div>
                        {standings.map((team, index) => (
                            <StandingRow
                                team={team}
                                position={index + 1}
                                key={team.id}
                            />
                        ))}
                    </div>
                    <div className="flex justify-start items-center mt-4 space-x-4">
                        <div className="w-4 h-4 bg-blue-100"></div>
                        <span>Champions League</span>
                        <div className="w-4 h-4 bg-yellow-100"></div>
                        <span>Europa League</span>
                        <div className="w-4 h-4 bg-green-100"></div>
                        <span>Conference League</span>
                        <div className="w-4 h-4 bg-orange-100"></div>
                        <span>Playout</span>
                        <div className="w-4 h-4 bg-red-100"></div>
                        <span>Relegation</span>
                    </div>
                </div>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
