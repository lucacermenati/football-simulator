import TopScorerHeader from "./TopScorerHeader";
import TopScorerRow from "./TopScorerRow";

export default function TopScorerTable({
    competition,
    scorers,
    onTeamClick,
    onPlayerClick,
}) {
    return (
        <div className="grid items-center grid-cols-[1fr_1fr_auto]">
            <TopScorerHeader />
            {scorers.map((player, index) => (
                <TopScorerRow player={player} index={index} key={player.id} />
            ))}
        </div>
    );
}
