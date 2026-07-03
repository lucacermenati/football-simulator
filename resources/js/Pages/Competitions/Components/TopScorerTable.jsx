import TopScorerHeader from "./TopScorerHeader";
import TopScorerRow from "./TopScorerRow";

export default function TopScorerTable({
    competition,
    scorers,
    onTeamClick,
    onPlayerClick,
}) {
    return (
        <div className="grid grid-cols-[1fr_1fr_auto] gap-y-4 gap-x-2 px-8 py-4">
            <TopScorerHeader />
            {scorers.map((player, index) => (
                <TopScorerRow player={player} index={index} key={player.id} />
            ))}
        </div>
    );
}
