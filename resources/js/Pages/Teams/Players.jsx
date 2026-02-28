import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import TeamLayout from "./Components/TeamLayout";
import PlayerTable from "@/Pages/Players/Components/PlayerTable";

export default function TeamPlayers({ team, players }) {
    return (
        <AuthenticatedLayout>
            <Head title={`${team.name} - Players`} />
            <TeamLayout team={team}>
                <div className="p-6 text-gray-900">
                    {players?.data?.length > 0 ? (
                        <PlayerTable players={players.data} />
                    ) : (
                        <div>
                            <h1 className="mb-4 text-xl font-semibold">
                                No players yet
                            </h1>
                            <p>
                                This team has no players yet. Create one or let
                                the factory generate some.
                            </p>
                        </div>
                    )}
                </div>
            </TeamLayout>
        </AuthenticatedLayout>
    );
}
