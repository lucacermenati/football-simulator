import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";
import TeamLogo from "../Teams/Components/TeamLogo";

export default function CompetitionMatch({ competition, match }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="px-6 py-4">
                    <div className="flex justify-between items-center">
                        <div className="flex justify-between items-center space-x-4">
                            <TeamLogo team={match.home_team} size={16} />
                            <span>{match.home_team.name}</span>
                        </div>
                        <div className="text-2xl font-bold">
                            {match.goal_home}
                        </div>
                        <div className="text-2xl font-bold">
                            {match.goal_away}
                        </div>
                        <div className="flex justify-between items-center space-x-4">
                            <span>{match.away_team.name}</span>
                            <TeamLogo team={match.away_team} size={16} />
                        </div>
                    </div>
                    <div className="flex flex-col justify-center items-center">
                        <div>{new Date(match.date).toLocaleDateString()}</div>
                        <div>{match.home_team.stadium}</div>
                    </div>
                    <div className="pt-4 mt-4 border-t border-lightGrey-600">
                        {match.scorers.map((player) => (
                            <div
                                key={player.id + "-" + player.pivot.minute}
                                className="flex justify-between"
                            >
                                {player.team_id === match.home_team.id ? (
                                    <>
                                        <span>
                                            {player.pivot.minute}'{" "}
                                            {player.first_name}{" "}
                                            {player.last_name}
                                        </span>
                                        <span />
                                    </>
                                ) : (
                                    <>
                                        <span />
                                        <span>
                                            {player.first_name}{" "}
                                            {player.last_name}{" "}
                                            {player.pivot.minute}'
                                        </span>
                                    </>
                                )}
                            </div>
                        ))}
                    </div>
                </div>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
