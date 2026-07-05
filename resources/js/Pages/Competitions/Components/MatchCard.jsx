import PrimaryButton from "@/Components/PrimaryButton";
import TeamLogo from "@/Pages/Teams/Components/TeamLogo";
import { Link, router } from "@inertiajs/react";

export default function MatchCard({ match }) {
    const dateOfToday = new Date();
    const matchDate = new Date(match.date);

    return (
        <div className="grid grid-cols-[1fr_auto_1fr] items-center border-b border-lightGrey-600">
            {/* Teams + scores */}
            <Link
                href={route("competitions.matches.show", [
                    match.competition_id,
                    match.id,
                ])}
            >
                <div className="grid grid-cols-[1fr_auto] gap-y-2 py-2 pr-4">
                    <div className="flex items-center space-x-2">
                        <TeamLogo team={match.home_team} size={6} />
                        <span className="font-semibold whitespace-nowrap">
                            {match.home_team.name}
                        </span>
                    </div>
                    <span className="font-semibold">{match.goal_home}</span>

                    <div className="flex items-center space-x-2">
                        <TeamLogo team={match.away_team} size={6} />
                        <span className="font-semibold whitespace-nowrap">
                            {match.away_team.name}
                        </span>
                    </div>
                    <span className="font-semibold">{match.goal_away}</span>
                </div>
            </Link>

            {/* Vertical separator */}
            <div className="h-14 border-l border-gray-300" />

            {/* Info */}
            <div className="pl-4">
                {match.played ? (
                    <Link
                        href={route("competitions.matches.show", [
                            match.competition_id,
                            match.id,
                        ])}
                    >
                        <PrimaryButton>VIEW</PrimaryButton>
                    </Link>
                ) : dateOfToday < matchDate ? (
                    <div>{new Date(match.date).toLocaleDateString()}</div>
                ) : (
                    <PrimaryButton
                        disabled={dateOfToday < matchDate}
                        onClick={() =>
                            router.post(route("matches.simulate", match.id))
                        }
                    >
                        PLAY
                    </PrimaryButton>
                )}
            </div>
        </div>
    );
}
