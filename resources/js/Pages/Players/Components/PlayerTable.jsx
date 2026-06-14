import Actions from "@/Components/Actions";

export default function PlayerTable({ players, actions = [] }) {
    const roleColors = {
        Goalkeeper: "bg-yellow-500",
        Defender: "bg-blue-500",
        Midfielder: "bg-green-500",
        Forward: "bg-red-500",
    };

    return (
        <div className="grid grid-cols-2">
            {players.map((player) => (
                <div
                    key={player.id}
                    className="grid grid-cols-[1fr_auto_auto] gap-12 items-center p-3"
                >
                    <div className="flex items-center space-x-4">
                        <img
                            src={`images/flags/${player.nationality}.svg`}
                            alt={player.nationality}
                            className="w-8 h-8 rounded-full border border-lightGrey-600"
                        />
                        <span className="min-w-0 font-medium truncate">
                            {`${player.first_name} ${player.last_name}`}
                        </span>
                    </div>

                    <div
                        className={`w-5 h-5 rounded-full ${
                            roleColors[player.role] ?? "bg-lightGrey-600"
                        }`}
                    />

                    <Actions actions={actions} item={player} />
                </div>
            ))}
        </div>
    );
}
