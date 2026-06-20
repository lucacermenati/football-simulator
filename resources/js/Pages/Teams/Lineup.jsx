import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import TeamLayout from "./Components/TeamLayout";
import PositionIndicator from "@/Components/PositionIndicator";

export default function TeamLineup({ team, startingEleven, substitutes }) {
    return (
        <AuthenticatedLayout>
            <Head title={`${team.name} - Lineup`} />
            <TeamLayout team={team}>
                <div className="px-4 py-4">
                    <div>{`${startingEleven?.Defender?.length}-${startingEleven?.Midfielder?.length}-${startingEleven?.Forward?.length}`}</div>
                    <div className="grid grid-cols-4 gap-4 py-4">
                        <div className="flex flex-col justify-center items-start space-y-6">
                            {startingEleven?.Goalkeeper?.map((player) => (
                                <div className="flex justify-items-start items-center space-x-2">
                                    <PositionIndicator
                                        position={player.position}
                                    >
                                        {player.number}
                                    </PositionIndicator>
                                    <div key={player.id}>
                                        {player.last_name}
                                    </div>
                                </div>
                            ))}
                        </div>
                        <div className="flex flex-col justify-center items-start space-y-6">
                            {startingEleven?.Defender?.map((player) => (
                                <div className="flex justify-items-start items-center space-x-2">
                                    <PositionIndicator
                                        position={player.position}
                                    >
                                        {player.number}
                                    </PositionIndicator>
                                    <div key={player.id}>
                                        {player.last_name}
                                    </div>
                                </div>
                            ))}
                        </div>
                        <div className="flex flex-col justify-center items-start space-y-6">
                            {startingEleven?.Midfielder?.map((player) => (
                                <div className="flex justify-items-start items-center space-x-2">
                                    <PositionIndicator
                                        position={player.position}
                                    >
                                        {player.number}
                                    </PositionIndicator>
                                    <div key={player.id}>
                                        {player.last_name}
                                    </div>
                                </div>
                            ))}
                        </div>
                        <div className="flex flex-col justify-center items-start space-y-6">
                            {startingEleven?.Forward?.map((player) => (
                                <div className="flex justify-items-start items-center space-x-2">
                                    <PositionIndicator
                                        position={player.position}
                                    >
                                        {player.number}
                                    </PositionIndicator>
                                    <div key={player.id}>
                                        {player.last_name}
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                    <div className="pt-8">
                        <h2 className="mb-4 font-semibold">Substitutes</h2>
                        <div className="grid grid-cols-3 gap-4">
                            {substitutes?.map((player) => (
                                <div className="flex justify-items-start items-center space-x-2">
                                    <PositionIndicator
                                        position={player.position}
                                    >
                                        {player.number}
                                    </PositionIndicator>
                                    <div key={player.id}>
                                        {player.last_name}
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </TeamLayout>
        </AuthenticatedLayout>
    );
}
