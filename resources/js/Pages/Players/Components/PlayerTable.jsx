import Actions from "@/Components/Actions";
import Flag from "@/Components/Flag";
import TeamLogo from "@/Pages/Teams/Components/TeamLogo";
import Modal from "@/Components/Modal";
import PlayerAdd from "@/Pages/Players/Components/PlayerAdd";
import PlusCircle from "@/Icons/PlusCircle";
import { useState } from "react";

export default function PlayerTable({ players, actions = [], teams = [] }) {
    const [isAddModalOpen, setIsAddModalOpen] = useState(false);
    const [selectedPlayer, setSelectedPlayer] = useState(null);
    return (
        <>
            <div className="grid relative grid-cols-2">
                <div className="absolute top-0 bottom-0 left-1/2 w-px bg-lightGrey-600" />
                {players.map((player) => {
                    return (
                        <div
                            key={player.id}
                            className="grid grid-cols-[1fr_auto_auto] gap-12 items-center p-3 px-6"
                        >
                            <div className="flex items-center space-x-4">
                                <Flag
                                    nationality={player.nationality}
                                    size={8}
                                />
                                <div
                                    className={`w-6 h-6 rounded-full bg-roleColors-${player.role}`}
                                />
                                <span className="overflow-hidden min-w-0 font-medium">
                                    {`${player.first_name} ${player.last_name}`}
                                </span>
                            </div>

                            <Actions actions={actions} item={player} />
                            <div
                                className="flex items-center space-x-4"
                                onClick={() => {
                                    setSelectedPlayer(player);
                                    setIsAddModalOpen(true);
                                }}
                            >
                                {teams && teams.length > 0 && (
                                    <>
                                        {player.team ? (
                                            <TeamLogo
                                                className="cursor-pointer"
                                                team={player.team}
                                                size={6}
                                            />
                                        ) : (
                                            <PlusCircle className="w-6 h-6 cursor-pointer text-primaryRed-800" />
                                        )}
                                    </>
                                )}
                            </div>
                        </div>
                    );
                })}
            </div>
            <Modal show={isAddModalOpen}>
                <PlayerAdd
                    player={selectedPlayer}
                    teams={teams}
                    onCancel={() => setIsAddModalOpen(false)}
                    onSuccess={() => setIsAddModalOpen(false)}
                />
            </Modal>
        </>
    );
}
