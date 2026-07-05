import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head, router } from "@inertiajs/react";
import TeamLogo from "../Teams/Components/TeamLogo";
import { Fragment } from "react";
import PrimaryButton from "@/Components/PrimaryButton";

export default function CompetitionMatch({ competition, match }) {
    const dateOfToday = new Date();
    const matchDate = new Date(match.date);

    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="px-6 py-4">
                    <div className="grid grid-cols-[1fr_auto_1fr] items-center">
                        <div className="flex gap-3 justify-self-start items-center">
                            <TeamLogo team={match.home_team} size={16} />
                            <span>{match.home_team.name}</span>
                        </div>

                        <div className="flex gap-2 justify-self-center items-center text-2xl font-bold">
                            <span>{match.goal_home}</span>
                            <span>-</span>
                            <span>{match.goal_away}</span>
                        </div>

                        <div className="flex gap-3 justify-self-end items-center">
                            <span>{match.away_team.name}</span>
                            <TeamLogo team={match.away_team} size={16} />
                        </div>
                    </div>
                    <div className="flex flex-col items-center">
                        <div>{new Date(match.date).toLocaleDateString()}</div>
                        <div>{match.home_team.stadium}</div>
                    </div>
                    <div className="pt-4 mt-4 border-t border-lightGrey-600">
                        {match.played && (
                            <div className="grid grid-cols-[1fr_auto_1fr] items-center gap-x-4 gap-y-1 p-4">
                                {match.scorers.map((player) => {
                                    const isHomeScorer =
                                        player.team_id === match.home_team.id;

                                    return (
                                        <Fragment
                                            key={`${player.id}-${player.pivot.minute}`}
                                        >
                                            <div className="flex gap-2 justify-self-start items-center">
                                                {isHomeScorer && (
                                                    <>
                                                        <img
                                                            src="/images/gol.svg"
                                                            alt="Goal"
                                                            className="w-4 h-4 shrink-0"
                                                        />
                                                        <span className="truncate">
                                                            {player.first_name}{" "}
                                                            {player.last_name}
                                                        </span>
                                                    </>
                                                )}
                                            </div>

                                            <span className="font-semibold text-center whitespace-nowrap">
                                                {player.pivot.minute}'
                                            </span>

                                            <div className="flex gap-2 justify-self-end items-center">
                                                {!isHomeScorer && (
                                                    <>
                                                        <span className="text-right truncate">
                                                            {player.first_name}{" "}
                                                            {player.last_name}
                                                        </span>
                                                        <img
                                                            src="/images/gol.svg"
                                                            alt="Goal"
                                                            className="w-4 h-4 shrink-0"
                                                        />
                                                    </>
                                                )}
                                            </div>
                                        </Fragment>
                                    );
                                })}
                            </div>
                        )}
                        {!match.played && (
                            <div className="flex justify-center">
                                <PrimaryButton
                                    disabled={dateOfToday < matchDate}
                                    onClick={() =>
                                        router.post(
                                            route("matches.simulate", match.id),
                                        )
                                    }
                                >
                                    PLAY
                                </PrimaryButton>
                            </div>
                        )}
                    </div>
                </div>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
