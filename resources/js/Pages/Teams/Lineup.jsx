import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import TeamLayout from "./Components/TeamLayout";

export default function TeamLineup({ team, players }) {
    return (
        <AuthenticatedLayout>
            <Head title={`${team.name} - Lineup`} />
            <TeamLayout team={team}>
                <div className="px-4 py-4">
                    <div>{`${players.Defender.length}-${players.Midfielder.length}-${players.Forward.length}`}</div>
                    <div className="grid grid-cols-4 gap-4 py-4">
                        <div className="flex flex-col justify-center items-start space-y-8">
                            {players.Goalkeeper.map((player) => (
                                <div className="flex justify-items-start items-center space-x-2">
                                    <div className="flex justify-center items-center w-6 h-6 rounded-full bg-roleColors-Goalkeeper">
                                        {player.number}
                                    </div>
                                    <div key={player.id}>
                                        {player.last_name}
                                    </div>
                                </div>
                            ))}
                        </div>
                        <div className="flex flex-col justify-center items-start space-y-8">
                            {players.Defender.map((player) => (
                                <div key={player.id}>{player.last_name}</div>
                            ))}
                        </div>
                        <div className="flex flex-col justify-center items-start space-y-8">
                            {players.Midfielder.map((player) => (
                                <div key={player.id}>{player.last_name}</div>
                            ))}
                        </div>
                        <div className="flex flex-col justify-center items-start space-y-8">
                            {players.Forward.map((player) => (
                                <div key={player.id}>{player.last_name}</div>
                            ))}
                        </div>
                    </div>
                </div>
            </TeamLayout>
        </AuthenticatedLayout>
    );
}
